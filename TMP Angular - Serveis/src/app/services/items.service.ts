import { Injectable } from '@angular/core';
import { map, Observable } from 'rxjs';
import { User } from '../../models/user.model';
import { Xuxemon } from '../../models/xuxemon.model';
import { Item } from 'src/models/item.model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { environment } from 'src/environments/environment';


@Injectable({
  providedIn: 'root'
})
export class ItemsService {
  
  constructor(
    private http: HttpClient,
  ) { }
  getItems(token: string):Observable<Item[]> {
   
    //const params = new HttpParams().set('token', 'holsa');
    const params = '?token=' + token;
    return this.http.get<Item[]>(`${environment.serverUrl}/items${params}`);
  }
  getInventory(token: string): Observable<any> {
    const params = '?token=' + token;
    return this.http.get<any>(`${environment.serverUrl}/inventory${params}`);
  }
  edit(token: string, item: Item): Observable<any> {
    const params = '?token=' + token+ '&item_id=' + item.id + '&item_prize=' + item.prize;
    
    return this.http.put<any>(`${environment.serverUrl}/items${params}`, null);
  }
}
