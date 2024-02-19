import {Component, OnInit} from '@angular/core';
import {Observable} from "rxjs";
import {User} from "../../models/user.model";
import {UsersService} from "../services/users.service";

@Component({
  selector: 'app-lista-usuarios',
  templateUrl: './lista-usuarios.component.html',
  styleUrls: ['./lista-usuarios.component.css']
})
export class ListaUsuariosComponent implements OnInit {

  currentPage: number = 1;
  usersInPage: User[] = [];

  constructor(
    public usersService: UsersService
  ) {
  }

  ngOnInit() {
    this.updateUsers();
  }

  updateUsers() {
    this.usersService.getUsers(this.currentPage).subscribe({
      next: value => this.usersInPage = value,
      error: err => console.log(err)
    });
  }

  getPreviousPage() {
    this.currentPage--;
    this.updateUsers();
  }

  getNextPage() {
    this.currentPage++;
    this.updateUsers();
  }

}
