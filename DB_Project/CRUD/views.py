from django.shortcuts import render
from rest_framework.views import APIView
from .models import Order, Item
from rest_framework import viewsets
from .serializers import OrderSerializer, ItemSerializer
from rest_framework.response import Response

# Create your views here.
class OrderViewSet(viewsets.ModelViewSet):
    queryset = Order.objects.all()
    serializer_class = OrderSerializer

    def get(self, request):
        orders = Order.objects.all()
        serializer = OrderSerializer(orders, many=True)
        return Response(serializer.data)

class ItemViewSet(viewsets.ModelViewSet):
    queryset = Item.objects.all()
    serializer_class = ItemSerializer

    def get(self, request):
        items = Item.objects.all()
        serializer = ItemSerializer(items, many=True)
        return Response(serializer.data)

class Index(APIView):
    def get(self, request):
        return render(request, "index.html")

class Insert(APIView):
    def get(self, request):
        return render(request, "insert.html")

class InsertResult(APIView):
    def post(self, request):
        order = Order()
        order.user = request.POST.get('user')
        order.department = request.POST.get('department')
        order.studentID = request.POST.get('studentID')
        order.phoneNumber = request.POST.get('phoneNumber')
        order.orderItem = request.POST.get('orderItem')
        order.save()

        item = Item.objects.get(orderItem=request.POST.get('orderItem'))
        item.remainder -= 1
        item.save()

        return render(request, "insert_result.html", {'order': order})

class Show(APIView):
    def get(self, request):
        orders = Order.objects
        items = Item.objects
        return render(request, 'show.html', {'orders': orders, 'items': items})
class Update(APIView):
    def get(self, request):
        orders = Order.objects
        return render(request, 'update.html', {'orders': orders})

    def post(self, request):
        update_id = request.POST.get('update_id')
        order = Order.objects.get(pk=update_id)
        order.user = request.POST.get('user')
        if request.POST.get('department') != "변경없음":
            order.department = request.POST.get('department')
        order.studentID = request.POST.get('studentID')
        order.phoneNumber = request.POST.get('phoneNumber')
        if request.POST.get('orderItem') != "변경없음":
            item1 = Item.objects.get(orderItem=order.orderItem)
            item1.remainder += 1
            item1.save()
            item2 = Item.objects.get(orderItem=request.POST.get('orderItem'))
            item2.remainder -= 1
            item2.save()
            order.orderItem = request.POST.get('orderItem')
        order.save()
        orders = Order.objects
        return render(request, 'update.html', {'orders': orders})


class Delete(APIView):
    def get(self, request):
        orders = Order.objects
        return render(request, 'delete.html', {'orders' : orders})

    def post(self, request):
        delete_id = request.POST.get('delete_id')
        if delete_id:
            order_item = Order.objects.get(id=delete_id).orderItem
            item = Item.objects.get(orderItem=order_item)
            item.remainder += 1
            item.save()
            Order.objects.filter(id=delete_id).delete()
        orders = Order.objects
        return render(request, 'delete.html', {'orders': orders})