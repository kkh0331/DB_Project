from django.urls import path, include
from .views import *
from rest_framework.routers import DefaultRouter

router = DefaultRouter()
router.register('orders', OrderViewSet, basename='orders')
router.register('items', ItemViewSet, basename='items')

urlpatterns = [
    path('', include(router.urls)),
    path('index/', Index.as_view(), name='main'),
    path('insert/', Insert.as_view()),
    path('insert/result/', InsertResult.as_view(), name='insertResult'),
    path('update/', Update.as_view()),
    path('delete/', Delete.as_view()),
    path('show/', Show.as_view())
]