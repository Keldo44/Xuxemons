import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { UsersService } from '../services/users.service';

@Component({
  selector: 'app-register-component',
  templateUrl: './register-component.component.html',
  styleUrls: ['./register-component.component.css']
})
export class RegisterComponentComponent {
  constructor(
    public usersService: UsersService
  ) {
  }

  registerForm: FormGroup = new FormGroup({
    email: new FormControl('', [Validators.required]),
    password: new FormControl('', [Validators.required]),
    rpassword: new FormControl('', [Validators.required])
  });

  result:string = '';

  enviarRegistro() {
    console.log(this.registerForm.value);  
    const email = this.registerForm.value.email;
    const password = this.registerForm.value.password;
    
    this.usersService.registerUser(email, password).subscribe({
      next: value => console.log(value),
      error: err => console.log(err)
    });
  }

}
