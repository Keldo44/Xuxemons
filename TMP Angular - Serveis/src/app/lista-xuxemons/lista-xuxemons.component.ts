import {Component, OnInit} from '@angular/core';
import {Observable} from "rxjs";
import { UsersService } from '../services/users.service';
import { Xuxemon } from '../../models/xuxemon.model';

@Component({
  selector: 'app-lista-xuxemons',
  templateUrl: './lista-xuxemons.component.html',
  styleUrls: ['./lista-xuxemons.component.css']
})
export class ListaXuxemonsComponent implements OnInit {

  xuxemons:Xuxemon[] = [];
  constructor( public usersService: UsersService ) {}
  ngOnInit() {
    this.updateXuxes();
  }
  updateXuxes() {
    this.usersService.getXuxemons().subscribe({
      next: value => {
        // Assign the value to the component property
        this.xuxemons = value;
      },
      error: err => console.error('Error:', err)
    });
  }
}
