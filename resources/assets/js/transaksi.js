import Vue from 'vue'
import axios from 'axios'
import VueSweetalert2 from 'vue-sweetalert2'

Vue.filter('currency', function(money) {
  return accounting.formatMoney(money, "Rp ", 2, ".", ",")
})

Vue.use(VueSweetalert2);

new Vue({
  el: '#dw',
  data: {
    product: {
      id: '',
      price: '',
      name: '',
      photo: ''
    },
    cart: {
      product_id: '',
      qty: '1'
    },
    shoppingCart: [],
    submitCart: false
  },
  watch: {
    'cart.product_id' : function() {
      if (this.cart.product_id) {
        this.getProduct()
      }
    }
  },
  mounted() {
    $('#product_id').select2({
      width: '100%'
    }).on('change', () => {
      this.cart.product_id = $('#product_id').val();
    });

    this.getCart()
  },
  methods: {
    getProduct() {
      axios.get(`/api/product/${this.cart.product_id}`).then((response) => {
        this.product = response.data
      })
    },
    addToCart() {
      this.submitCart = true;
      axios.post('/api/cart', this.cart).then((response) => {
        setTimeout(() => {
          this.shoppingCart = response.data
          this.cart.product_id = ''
          this.cart.qty = '1'
          this.product = {
            id: '',
            price: '',
            name: '',
            photo: ''
          }
          $('#product_id').val('')
          this.submitCart = false
        }, 2000)
      }).catch((error) => {

      })
    },
    getCart() {
      axios.get('/api/cart').then((response) => {
        this.shoppingCart = response.data
      })
    },
    removeCart(id) {
      this.$swal({
        title: 'Are you sure?',
        text: 'You can\'t undo this action',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
        showCloseButton: true,
        showLoaderOnConfirm: true,
        preConfirm: () => {
          return new Promise((resolve) => {
            setTimeout(() => {
              resolve()
            }, 2000)
          })
        },
        allowOutsideClick: () => !this.$swal.isLoading()
      }).then((result) => {
        if (result.value) {
          axios.delete(`/api/cart/${id}`).then ((response) => {
            this.getCart();
          }).catch ((error) => {
            console.log(error);
          })
        }
      })
    }
  }
})