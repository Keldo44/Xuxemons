import { Component, OnInit } from '@angular/core';
import { Item } from 'src/models/item.model';
import { ItemsService } from '../services/items.service';

@Component({
  selector: 'app-inventory',
  templateUrl: './inventory.component.html',
  styleUrls: ['./inventory.component.css']
})
export class InventoryComponent implements OnInit {
  items: any[] = [];
  token: string = localStorage.getItem('token') || 'default';
  
  constructor(
    public itemsService: ItemsService,

  ){}
  
  ngOnInit(){
      this.fillItems();
  }
  
  fillItems() {
    this.itemsService.getInventory(this.token).subscribe({
      next: value => {
        this.items=value;
        console.log(value);
      },
      error: err => console.error(err)
    });
  }
}