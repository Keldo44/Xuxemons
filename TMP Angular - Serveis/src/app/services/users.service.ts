import { Injectable } from '@angular/core';
import { map, Observable } from 'rxjs';
import { User } from '../../models/user.model';
import { Xuxemon } from '../../models/xuxemon.model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root',
})

export class UsersService {
  catchXuxemonRand() {
    const token = localStorage.getItem('token') || 'default';

    // Set up the params with the token
    const params = `?token=${token}`;
    
    // Make the GET request with params
    //console.log(environment.serverUrl,'/xuxemons/',params);
    return this.http.post(`${environment.serverUrl}/xuxemons/catch/${params}`, null);
  }
  createXuxemon(xuxemon:Xuxemon) {
    const token = localStorage.getItem('token') || 'default';

    // Set up the params with the token
    const params = `?token=${token}&name=${xuxemon.name}&type=${xuxemon.type}`;
    
    // Make the GET request with params
    //console.log(environment.serverUrl,'/xuxemons/',params);
    return this.http.post(`${environment.serverUrl}/xuxemons/${params}`, null);
    
  }
  
  editXuxemon(xuxemon: { id?: number; name: any; type: any; }) {


    const token = localStorage.getItem('token') || 'default';

    // Set up the params with the token
    const params = `?token=${token}&name=${xuxemon.name}&type=${xuxemon.type}`;
    
    // Make the GET request with params
    //console.log(environment.serverUrl,'/xuxemons/',params);
    return this.http.put(`${environment.serverUrl}/xuxemons/${xuxemon.id}${params}`, null);
    //return this.http.put("http://localhost:8000/xuxemons/4?token=wcekhebcuewjvnbhowievnoewilvjnowilkvjnoewlkvnjlkewvnkvjlnvowik&name=Keldo&type=fire",null);
  }
  deleteXuxemon(id: number) {
    // Get the token from local storage, use 'default' if it's not present
    const token = localStorage.getItem('token') || 'default';

    // Set up the params with the token
    const params = new HttpParams().set('token', token);

    // Make the GET request with params
    return this.http.delete(`${environment.serverUrl}/xuxemons/${id}`, { params });
  }
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
  getXuxedex(): Observable<Xuxemon[]> {
   // Get the token from local storage, use 'default' if it's not present
   const token = localStorage.getItem('token') || 'default';

   // Set up the params with the token
   const params = new HttpParams().set('token', token);

   // Make the GET request with params
   return this.http.get<Xuxemon[]>(`${environment.serverUrl}/xuxedex`, { params });
  }
  getXuxemons(): Observable<Xuxemon[]> {
    // Get the token from local storage, use 'default' if it's not present
   const token = localStorage.getItem('token') || 'default';

   // Set up the params with the token
   const params = new HttpParams().set('token', token);

   // Make the GET request with params
   return this.http.get<Xuxemon[]>(`${environment.serverUrl}/xuxemons`, { params });
  }
  
 

  getUserRole(): Observable<string> {
    const token = localStorage.getItem('token') || 'default';

    // Set up the params with the token
    const params = new HttpParams().set('token', token);

    return this.http.get<string>(`${environment.serverUrl}/role`, { params });
  }
}

