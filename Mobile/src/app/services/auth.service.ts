import { Injectable, EventEmitter } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

	apiURL:string = "http://localhost:8000/api/";
	is_logged:boolean = localStorage.getItem("userInfo") !== null;

	logged:EventEmitter<boolean> = new EventEmitter<boolean>();

	http_headers = {
		headers: {
		"Access-Control-Allow-Origin" : "*",
		"Access-Control-Allow-Methods" : "POST, GET, PUT, DELETE,OPTIONS",
		"Access-Control-Allow-Headers":"Content-Type, Accept, Authorization"
		}
	}

  constructor(public http: HttpClient) { }

	// Routes 
	login(login_data:any):Observable<any> {	return this.http.post(this.apiURL + "login", login_data,this.http_headers); }
	register(register_data:any):Observable<any> { return this.http.post(this.apiURL + "register", register_data,this.http_headers); }
	validateUsername(username:string):Observable<any> { return this.http.get(this.apiURL + "user/validate/" + username); }
}
