import { Component } from '@angular/core';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {

  items:any[] = [
    {name:"Babel",book_amount:77},
    {name:"Tipo Babel só que não",book_amount:95},
    {name:"Big boy",book_amount:1000},
    {name:"Nome gigante que provavelmente vai quebrar o role todo fodase quero testar aaaa",book_amount:45},
    // {name:"Babel",book_amount:77},
    // {name:"Babel",book_amount:77},
    // {name:"Babel",book_amount:77},
  ];
  constructor() {}

}
