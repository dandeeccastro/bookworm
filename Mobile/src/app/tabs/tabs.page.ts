import { Component } from '@angular/core';
import { AuthService } from "../services/auth.service";

@Component({
  selector: 'app-tabs',
  templateUrl: 'tabs.page.html',
  styleUrls: ['tabs.page.scss']
})
export class TabsPage {

	logged:boolean = localStorage.getItem("userInfo") !== null;
  constructor(public auth_service: AuthService) {
		this.auth_service.logged.subscribe((res) => {
			this.logged = res;
		})
	}

}
