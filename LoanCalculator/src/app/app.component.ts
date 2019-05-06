import { Component, OnInit, ViewEncapsulation } from "@angular/core";
import * as moment from "moment";

@Component({
  selector: "app-loan-calculator",
  templateUrl: "./app.component.html",
  styleUrls: ["./app.component.scss"],
  encapsulation: ViewEncapsulation.Emulated
})
export class AppComponent implements OnInit {
  principal = 100;
  minPrincipal = 100;
  maxPrincipal = 8000;
  principalStep = 100;
  tenure = 3;
  minTenure = 3;
  maxTenure = 33;
  tenureStep = 1;
  interestRate = 60;
  total = 0;
  interest = 0;
  payDate;
  paymentDuration = "monthly";

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
    this.payDate = currentDate.add(this.tenure, "M");
    this.interest =
      Math.round((this.principal * this.interestRate * this.tenure) / (365 * 100));
    this.total = this.interest + this.principal;
  }

  getUrl() {
    const url =
      "http://ec2-13-233-87-195.ap-south-1.compute.amazonaws.com:3001";
    window.open(
      `${url}/loan-application/${this.principal}/${this.tenure}`,
      "_blank"
    );
  }
}
