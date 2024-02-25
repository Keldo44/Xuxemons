import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { UsersService } from '../../services/users.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login-component',
  templateUrl: './login-component.component.html',
  styleUrls: ['./login-component.component.css']
})
export class LoginComponentComponent {

  constructor(
    public usersService: UsersService,
    private router: Router,
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
      next: (response: any) => {
        // Assuming your API returns a token in the response
        const token = response.session_token;
        // Guarda el token en el local storage
        localStorage.setItem('token', token);

        this.usersService.getUserRole().subscribe({
          next: (response: any) => {
            localStorage.setItem('role', response.role);
          },error: (err) => {
            console.error('Error en el inicio de sesión', err);
          }
        });

  
        // Redirige al usuario a la página deseada (por ejemplo, el dashboard)
        this.router.navigate(['/lista-xuxemons']);
      },
      error: (err) => {
        // Maneja el error de inicio de sesión aquí
        console.error('Error en el inicio de sesión', err);
        alert('Error en el inicio de sesión. Verifica tus credenciales.');
      }
    });
  }


}
