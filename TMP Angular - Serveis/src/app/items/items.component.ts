import {Component, OnInit} from '@angular/core';
import { ItemComponent } from './item/item.component';
import { Item } from 'src/models/item.model';
import { ItemsService } from '../services/items.service';
@Component({
  selector: 'app-items',
  templateUrl: './items.component.html',
  styleUrls: ['./items.component.css']
})
export class ItemsComponent implements OnInit {
  items: Item[] = [];
  token: string = localStorage.getItem('token') || 'default';
  
  constructor(
    public itemsService: ItemsService,

  ){}
  
  ngOnInit(){
      this.fillItems();
  }
  
  fillItems() {
    this.itemsService.getItems(this.token).subscribe({
      next: value => {
        this.items=value;
        console.log(value);
      },
      error: err => console.error(err)
    });
  }
}


