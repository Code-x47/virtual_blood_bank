const app = Vue.createApp({
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