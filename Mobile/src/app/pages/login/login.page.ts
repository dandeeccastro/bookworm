import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';
import { AuthService } from "../../services/auth.service";

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

	login_form:FormGroup;
	is_username_beign_used:boolean = false;

  constructor(public fb:FormBuilder,public auth_service: AuthService) { 
	}

  ngOnInit() {
		this.login_form = this.fb.group({
			username: new FormControl('', [ Validators.required ]), 
			password: new FormControl('', [ Validators.required ]), 
		});
  }

	validateUsername(username:string) {
		this.auth_service.validateUsername(username).subscribe((res)=>{
			this.is_username_beign_used = res.result;
			console.log(res);
		});
	}
	
	onSubmit(login_data:any){
		console.log(login_data);
	}

}
