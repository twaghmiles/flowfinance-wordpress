import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-loan-calculator',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {
  options: any;
  principal = 5000;
  minPrincipal = 5000;
  maxPrincipal = 50000;
  principalStep = 5000;
  tenure = 6;
  minTenure = 6;
  maxTenure = 60;
  tenureStep = 6;
  interestRate = 24;
  total = 0;
  interest = 0;
  echartsIntance;

  ngOnInit() {
    this.options = {
      color: ['#9c27b0', '#e91e63', '#673ab7', '#f44336', '#2196f3'],
      tooltip: {
        trigger: 'item',
        formatter: '{b} : {c} ({d}%)',
      },
      series: [
        {
          name: 'Countries',
          type: 'pie',
          radius: '80%',
          center: ['50%', '50%'],
          data: [
            { value: 0, name: 'Principal Amount' },
            { value: 0, name: 'Interest & Fees' },
          ],
          itemStyle: {
            emphasis: {
              shadowBlur: 10,
              shadowOffsetX: 0,
            },
          },
          label: {
            normal: {
              textStyle: {
                color: '#000',
              },
            },
          },
          labelLine: {
            normal: {
              lineStyle: {
                color: '#000',
              },
            },
          },
        },
      ],
    };
  }

  onChartInit(ec) {
    this.echartsIntance = ec;
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
      return Math.round(value / 1000) + 'k';
    }

    return value;
  }

  calculateInterest() {
    this.interest = this.principal * this.interestRate * this.tenure / (12 * 100);
    this.total = this.interest + this.principal;
    this.options.series[0].data = [
      { value: this.principal, name: 'Principal Amount' },
      { value: this.interest, name: 'Interest & Fees' },
    ];
    this.echartsIntance.setOption(this.options);
  }
}
