import { Component, OnInit } from '@angular/core';
import { Item } from 'src/models/item.model';
import { ItemsService } from '../services/items.service';
import { Router } from '@angular/router';
import { FormControl, FormGroup, FormsModule, NgModel, Validators } from '@angular/forms';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-adminitems',
  templateUrl: './adminitems.component.html',
  styleUrls: ['./adminitems.component.css']
})
  export class AdminitemsComponent implements OnInit {
recibirItem($event: Item) {
throw new Error('Method not implemented.');
}
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