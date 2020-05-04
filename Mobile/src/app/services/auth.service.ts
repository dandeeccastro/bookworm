import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

	apiURL:string = "http://localhost:8000/api/";

  constructor(public http: HttpClient) { }

	validateUsername(username:string):Observable<any> { return this.http.get(this.apiURL + "user/validate/" + username); }
}
