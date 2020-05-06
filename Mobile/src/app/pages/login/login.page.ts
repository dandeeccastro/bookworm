import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';
import { AuthService } from "../../services/auth.service";
import { ToastController } from "@ionic/angular";

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

	login_form:FormGroup;
	is_username_being_used:boolean;

  constructor(
		public fb:FormBuilder,
		public auth_service: AuthService,
		public toast_controller: ToastController) { 
	}

  ngOnInit() {
		this.login_form = this.fb.group({
			username: new FormControl('', [ Validators.required ]), 
			password: new FormControl('', [ Validators.required ]), 
		});
  }

	validateUsername(username:string) {
		this.auth_service.validateUsername(username).subscribe((res)=>{
			this.is_username_being_used = res.result;
			if (this.is_username_being_used === false) 
				this.loginErrorToast("Erro: Username não existe");
		});
	}
	
	onSubmit(login_data:any){
		console.log(login_data);
	}

	private async loginErrorToast(message:string) {
		const toast = await this.toast_controller.create({
			message: message,
			duration: 1500,
			position: "top"
		}); 
		toast.present();
	}

}
