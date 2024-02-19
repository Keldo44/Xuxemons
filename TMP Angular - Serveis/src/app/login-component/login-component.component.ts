import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { UsersService } from '../services/users.service';

@Component({
  selector: 'app-login-component',
  templateUrl: './login-component.component.html',
  styleUrls: ['./login-component.component.css']
})
export class LoginComponentComponent {

  constructor(
    public usersService: UsersService
  ) {
  }

loginForm: FormGroup = new FormGroup({
    email: new FormControl('', [Validators.required]),
    password: new FormControl('', [Validators.required]),

  });

  login() {
    console.log(this.loginForm.value);  
    const email = this.loginForm.value.email;
    const password = this.loginForm.value.password;
  
    this.usersService.login(email, password).subscribe({
      next: value => console.log(value),
      error: err => alert(err) 
    });
  }


}
