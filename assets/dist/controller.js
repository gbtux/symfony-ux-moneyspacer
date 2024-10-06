import { Controller } from '@hotwired/stimulus';

class MoneySpacerController extends Controller{

    static targets = ['input']
    static values = { signed: String } //not working :(

    connect() {
        this.inputTarget.addEventListener('input', function (event) {
            let num = event.target.value

            if(event.target.dataset.signed === "unsigned") {
                num = num.toString().replace(/[^-0-9]/g, "");
            }else{
                num = num.toString().replace(/[^0-9]/g, "");
            }

            num = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            event.target.value = num
        })
    }
}

export { MoneySpacerController as default };