import { Component, OnInit } from '@angular/core';
import * as moment from 'moment';

@Component({
  selector: 'app-loan-calculator',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {
  principal = 5000;
  minPrincipal = 5000;
  maxPrincipal = 50000;
  principalStep = 5000;
  tenure = 6;
  minTenure = 6;
  maxTenure = 60;
  tenureStep = 6;
  interestRate = 5;
  total = 0;
  interest = 0;
  payDate;
  paymentDuration = 'monthly';

  ngOnInit() {
    this.calculateInterest();
  }

  onSliderChange(e, type: string) {
    this[type] = e.value;
    this.calculateInterest();
  }

  formatPrincipalLabel(value: number | null) {
    if (!value) {
      return 0;
    }

    if (value >= 1000) {
      return `R ${Math.round(value / 1000)}k`;
    }

    return value;
  }

  formatTenurelLabel(value: number | null) {
    if (!value) {
      return 0;
    }

    return `${value} months`;
  }

  calculateInterest() {
    const currentDate = moment();
    this.payDate = currentDate.add(this.tenure, 'M');
    this.interest = this.principal * this.interestRate * this.tenure / (12 * 100);
    this.total = this.interest + this.principal;
  }
}
