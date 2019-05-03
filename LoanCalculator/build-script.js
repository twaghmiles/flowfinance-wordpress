const fs = require('fs-extra');
const concat = require('concat');

(async function build() {

    const files =[
        './dist/LoanCalculator/main.js',
        './dist/LoanCalculator/polyfills.js',
        './dist/LoanCalculator/runtime.js'
    ]

    await fs.ensureDir('elements')

    await concat(files, 'elements/LoanCalculator.js')
    console.info('Angular Elements created successfully!')

})()
