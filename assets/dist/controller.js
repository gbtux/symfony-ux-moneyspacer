import { Controller } from '@hotwired/stimulus';

class MoneySpacerController extends Controller{

    static targets = ['input']

    connect() {
        this.inputTarget.addEventListener('input', function (event) {
            let num = event.target.value
            num = num.toString().replace(/[^0-9]/g, "");
            num = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            event.target.value = num
        })
    }
}

export { MoneySpacerController as default };