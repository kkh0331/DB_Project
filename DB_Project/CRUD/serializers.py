from rest_framework import serializers
from .models import *

class OrderSerializer(serializers.ModelSerializer):
    class Meta:
        model = Order
        fields = ['id', 'user', 'department', 'studentID', 'phoneNumber', 'orderItem']

class ItemSerializer(serializers.ModelSerializer):
    class Meta:
        model = Item
        fields = ['orderItem',"remainder"]