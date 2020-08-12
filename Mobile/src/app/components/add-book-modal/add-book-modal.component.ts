import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-add-book-modal',
  templateUrl: './add-book-modal.component.html',
  styleUrls: ['./add-book-modal.component.scss'],
})
export class AddBookModalComponent implements OnInit {

	book_form: FormGroup;

  constructor(
		private fb: FormBuilder
	) { }

  ngOnInit() {
		this.generateFormStructure();
	}

	public submitBook(): void {
		console.log('This works');
	}

	private generateFormStructure() {
		this.book_form = this.fb.group({
			title: new FormControl(null,[Validators.required]),
			year: new FormControl(null,[Validators.required]),
			edition: new FormControl(null),
			series_position: new FormControl(null),
			series_id: new FormControl(null),
			publisher_id: new FormControl(null),
			author_id: new FormControl(null),
		});
	}
}
