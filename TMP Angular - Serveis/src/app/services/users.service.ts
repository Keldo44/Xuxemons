import { Injectable } from '@angular/core';
import { map, Observable } from 'rxjs';
import { User } from '../../models/user.model';
import { Xuxemon } from '../../models/xuxemon.model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';

@Injectable({
  providedIn: 'root',
})
export class UsersService {
  constructor(private http: HttpClient) {}
  /*registerUser(email: string, password: string): Observable<any> {
    return this.http.post('https://reqres.in/api/register', {
      email: email,
      password: password,
    });
  }*/
  registerUser(email: string, password: string): Observable<any> {
    const params = "?email=" + email + "&name=keldo&password=" + password;
    return this.http.post('http://localhost:8000/register'+params, {
    /*email:email,
    password:password*/
    });
  }
  login(email: string, password: string): Observable<any> {
    const params = "?email=" + email + "&password=" + password;
    return this.http.post('http://localhost:8000/login'+params, {
    /*email:email,
    password:password*/
    });
  }

  getUsers(page: number = 1): Observable<User[]> {
    // Ejemplo de HttpHeaders
    const httpHeaders: HttpHeaders = new HttpHeaders({
      'Content-Type': 'application/json; charset=utf-8',
      'Access-Control-Allow-Origin': '*',
    });

    // Ejemplo de HttpParams
    const httpParams: HttpParams = new HttpParams().set('page', page);

    return this.http
      .get<User[]>('https://reqres.in/api/users', {
        headers: httpHeaders,
        params: httpParams,
      })
      .pipe(
        map((res: any) => {
          console.log(res);
          return res.data;
        })
      );
  }
  getXuxemons(): Observable<Xuxemon[]> {
    // Ejemplo de HttpHeaders

    return this.http
      .get<Xuxemon[]>('http://127.0.0.1:8000/xuxemons', {});
  }
}


