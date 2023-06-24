from django.db import models

# Create your models here.
class Order(models.Model):
    user = models.CharField(max_length=200)
    department = models.CharField(max_length=200)
    studentID = models.IntegerField()
    phoneNumber = models.CharField(max_length=13)
    orderItem = models.CharField(max_length=200)

class Item(models.Model):
    orderItem = models.CharField(max_length=200, primary_key=True)
    remainder = models.IntegerField()