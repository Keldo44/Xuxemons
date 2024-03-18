import { Component, EventEmitter, Input, Output } from '@angular/core';
import { ItemsService } from 'src/app/services/items.service';
import { Item } from 'src/models/item.model';
import { Router } from '@angular/router';
import { FormControl, FormGroup, FormsModule, NgModel, Validators } from '@angular/forms';
import { Observable } from 'rxjs';
import { Token } from '@angular/compiler';

@Component({
  selector: 'app-item3',
  templateUrl: './item.component.html',
  styleUrls: ['./item.component.css']
})
export class ItemComponent3 {
constructor(
  public itemsService: ItemsService,
){}
editing: boolean;
token: string = localStorage.getItem('token') || 'default';
@Input() item: any;
@Output() guardarItemEvento: EventEmitter<Item> = new EventEmitter<Item>();

editItemForm: FormGroup = new FormGroup({
  name: new FormControl('', [Validators.required]),
  prize: new FormControl('', [Validators.required]),
});

edit() {
  this.itemsService.edit(this.token, this.editItemForm.value).subscribe({
    next: value => {
      console.log(value);

      this.guardarItemEvento.emit(this.editItemForm.value);
      this.editItemForm.reset();
      this.changeEditing();
    },
    error: err => console.error(err),
  });

}
changeEditing() {
 this.editing = !this.editing;
}

deleteItem() {
  throw new Error('Method not implemented.');
}
scale: number = 1;
prepareBuy() {
  if (this.scale == 1) {
    this.scale = 1.2;
  }else{
    this.scale = 1;
  }
}
 
}
