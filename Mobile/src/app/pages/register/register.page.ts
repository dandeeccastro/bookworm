import { Component, OnInit, ViewChild } from '@angular/core';
import { IonSlides } from "@ionic/angular"
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';
import { AuthService } from "../../services/auth.service";
import { Router } from "@angular/router";

@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage implements OnInit {

	is_username_being_used:boolean;
	register_form:FormGroup;

	@ViewChild(IonSlides,{static:false}) slides: IonSlides;
	slider_options:any = { allowTouchMove: false	}

  constructor(
		public fb:FormBuilder,
		public auth_service:AuthService,
		public router: Router) { 
		this.register_form = this.fb.group({
			name: new FormControl('',[Validators.required]),
			username: new FormControl('',[Validators.required]),
			email: new FormControl('',[Validators.required, Validators.email]),
			password: new FormControl('',[Validators.required]),
			c_password: new FormControl('',[Validators.required]),
		});	
	}

  ngOnInit() {}

	onSubmit(register_data:any) {
		console.log(register_data)		
		this.auth_service.register(register_data).subscribe((res)=>{
			localStorage.setItem("userInfo",JSON.stringify(res));
			this.auth_service.logged.emit(true);
			this.router.navigate(['tabs/tab1']);	
		})
	}

	validateUsername(username:string) {
		if(username) {
			this.auth_service.validateUsername(username).subscribe((res)=>{
				this.is_username_being_used = res.result;
			});
		}
	}

	validatePassword():boolean {
		return this.register_form.value.password === this.register_form.value.c_password;
	}

	goToNextCard() { this.slides.slideNext() } 
	goToPreviousCard() { this.slides.slidePrev() } 
	goToStartCard() { this.slides.slideTo(0) }

}
