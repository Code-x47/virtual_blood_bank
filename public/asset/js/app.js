/*const app = Vue.createApp({
    data() {
    return {
      user: true,
      inventory: false,
      order: false,
      payment: false,
      bank: false
        }
    },
    methods: {
    myInventory() {
    this.inventory = true
    this.user = false
    this.order = false
    this.payment = false
    this.bank = false
    },

    myUsers() {
    this.inventory = false
    this.user = true
    this.order = false
    this.payment = false
    this.bank = false
    },
    myOrders() {
    this.inventory = false
    this.user = false
    this.order = true
    this.payment = false
    this.bank = false
    },

    myPayments() {
    this.inventory = false
    this.user = false
    this.order = false
    this.payment = true
    this.bank = false
    },

    myBanks() {
    this.inventory = false
    this.user = false
    this.order = false
    this.payment = false
    this.bank = true
    }
    }
}).mount('#app');
*/


const app = Vue.createApp({
    data() {
        return {
            user: false,
            inventory: false,
            order: false,
            payment: false,
            bank: false
        }
    },
    mounted() {
        const section = localStorage.getItem('section') || 'user';
        this[section] = true;
    },
    methods: {
        myInventory() {
            this.setSection('inventory');
        },
        myUsers() {
            this.setSection('user');
        },
        myOrders() {
            this.setSection('order');
        },
        myPayments() {
            this.setSection('payment');
        },
        myBanks() {
            this.setSection('bank');
        },
        setSection(sectionName) {
            // Reset all
            this.user = this.inventory = this.order = this.payment = this.bank = false;
            // Set selected
            this[sectionName] = true;
            localStorage.setItem('section', sectionName);
        }
    }
}).mount('#app');

