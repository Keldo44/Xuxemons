import { Component, Input } from '@angular/core';
import { Item } from 'src/models/item.model';

@Component({
  selector: 'app-item2',
  templateUrl: './item.component.html',
  styleUrls: ['./item.component.css']
})
export class ItemComponent2 {
scale: number = 1;
prepareBuy() {
  if (this.scale == 1) {
    this.scale = 1.2;
  }else{
    this.scale = 1;
  }
}
  @Input() item: any;
}
