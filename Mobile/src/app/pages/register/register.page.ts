import { Component, OnInit, ViewChild } from '@angular/core';
import { IonSlides } from "@ionic/angular"
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';
import { AuthService } from "../../services/auth.service";

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

  constructor(public fb:FormBuilder,public auth_service:AuthService) { 
		this.register_form = this.fb.group({
			name: new FormControl('',[Validators.required]),
			username: new FormControl('',[Validators.required]),
			email: new FormControl('',[Validators.required]),
			password: new FormControl('',[Validators.required]),
			c_password: new FormControl('',[Validators.required]),
		});	
	}

  ngOnInit() {
  }

	onSubmit(register_data:any) {
		console.log(register_data)		
	}

	validateUsername(username:string) {
		if(username) {
			this.auth_service.validateUsername(username).subscribe((res)=>{
				this.is_username_being_used = res.result;
			});
		}
	}

	goToNextCard() { this.slides.slideNext() } 
	goToPreviousCard() { this.slides.slidePrev() } 
	goToStartCard() { this.slides.slideTo(0) }

}
