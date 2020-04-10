<template>
    <form @submit.prevent="submit">
        <div class="uk-child-width-1-1 uk-child-width-1-2@s" uk-grid>
            <div>
                <search-input
                    param="data"
                    :url="rentersUrl"
                    show-attribute="fullname"
                    :classes="{ 'uk-form-danger' : error('renter_id') }"
                    required="true"
                    :value="renter"
                    :placeholder="lang.get('pages.rents.placeholders.search_renter')"
                    @select="selectRenter"
                ></search-input>

                <span v-if="error('renter_id')" class="invalid-feedback" role="alert">
                    <strong class="uk-text-danger">{{ error('renter_id') }}</strong>
                </span>

                <search-input
                    param="data"
                    :url="booksUrl"
                    show-attribute="name"
                    :classes="{ 'uk-form-danger' : error('book_id') }"
                    required="true"
                    :value="book"
                    :placeholder="lang.get('pages.rents.placeholders.search_book')"
                    @select="selectBook"
                ></search-input>

                <span v-if="error('book_id')" class="invalid-feedback" role="alert">
                    <strong class="uk-text-danger">{{ error('book_id') }}</strong>
                </span>

                <input v-model.number="form.books_count" type="number" step="0.01" :placeholder="lang.get('models.rent.books_count')" class="uk-input" :class="{ 'uk-form-danger' : error('books_count') }" name="books_count" required>

                <span v-if="error('books_count')" class="invalid-feedback" role="alert">
                    <strong class="uk-text-danger">{{ error('books_count') }}</strong>
                </span>

                <input v-model.number="form.period" type="number" step="0.01" :placeholder="lang.get('models.rent.period')" class="uk-input" :class="{ 'uk-form-danger' : error('period') }" name="period" required>

                <span v-if="error('period')" class="invalid-feedback" role="alert">
                    <strong class="uk-text-danger">{{ error('period') }}</strong>
                </span>

                <input v-model.number="form.deposit" type="number" step="0.01" :placeholder="lang.get('models.rent.deposit')" class="uk-input" :class="{ 'uk-form-danger' : error('deposit') }" name="deposit"  required>

                <span v-if="error('deposit')" class="invalid-feedback" role="alert">
                    <strong class="uk-text-danger">{{ error('deposit') }}</strong>
                </span>

                <p class="uk-text-meta uk-margin-remove" v-if="cost.minDeposit" v-html="lang.get('pages.rents.min_deposit_alert', { deposit: cost.minDeposit })"></p>
                <p class="uk-text-meta uk-margin-remove" v-else v-html="lang.get('pages.rents.min_deposit_alert_0')"></p>
            </div>
            <div class="cost-box">
                <hr>
                <h4 class="uk-text-bold uk-margin-remove">{{ lang.get('pages.rents.cost_calculation') }}</h4>

                <ul class="list-key-value uk-padding-remove">
                    <li>
                        <strong>{{ lang.get('pages.rents.cost_rent') }}</strong>
                        <span class="uk-float-right">{{ lang.choice('pages.rents.cost', cost.rent, { cost: cost.rent }) }}</span>
                    </li>
                    <li>
                        <strong>{{ lang.get('pages.rents.deposit_amount') }}</strong>
                        <span class="uk-float-right">{{ lang.choice('pages.rents.cost', finallyDeposit, { cost: finallyDeposit }) }}</span>
                    </li>
                    <li class="uk-margin-small-top">
                        <hr>
                        <h5 class="uk-text-bold uk-margin-remove">{{ lang.get('pages.rents.total_cost') }}
                            <span class="uk-float-right">{{ lang.choice('pages.rents.cost', cost.total, { cost: cost.total }) }}</span>
                        </h5>
                    </li>
                </ul>

                <button ref="submit" class="uk-button button-primary" :class="{ 'uk-disabled' : !isValid(true) || loading }" type="submit">{{ lang.get(`buttons.${rent ? 'save' : 'rent'}`) }}</button>
            </div>
        </div>
    </form>
</template>

<script>
import { debounce, get as _get, set as _set, toArray } from 'lodash'

export default {
  name: "FormComponent",
  props: {
    action: {
      type: String,
      required: true
    },
    rent: {
      type: Object,
      default: null
    },
    renter: {
      type: Object,
      default: null
    },
    book: {
      type: Object,
      default: null
    },
    rentersUrl: {
      type: String,
      required: true
    },
    booksUrl: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      form: {
        renter_id: '',
        book_id: '',
        books_count: '',
        period: '',
        deposit: ''
      },
      errors: {},
      selectedBook: {},
      cost: {
        rent: 0,
        minDeposit: 0,
        deposit: 0,
        total: 0
      },
      loading: false
    }
  },
  created() {
    if (this.rent) {
      this.form = { ...this.rent };
    }
  },
  watch: {
    'form.books_count': function() {
      this.calculation();
      this.clearError('books_count');
    },
    'form.period': function() {
      this.calculation();
      this.clearError('period');
    },
    'form.deposit': debounce(function() {
      this.calculation();
      this.clearError('deposit');
    }, 600),
  },
  computed: {
    finallyDeposit: {
      get() {
        return this.loading ? this.cost.deposit : this.form.deposit || 0;
      }
    }
  },
  methods: {
    submit() {
      if (!this.isValid(true) || this.loading) {
        return;
      }

      this.loading = true;
      this.cost.deposit = this.form.deposit;
      this.$refs.submit.setAttribute('uk-spinner', 'ratio: .5');

      axios[this.rent ? 'put' : 'post'](this.action, this.form).then(({ data }) => {
        setTimeout(() => {
          this.loading = false;
          this.$refs.submit.removeAttribute('uk-spinner');

          if (data.redirect_url) {
            window.location.href = data.redirect_url;
          }
        }, 500)
      }).catch(({ response }) => {
        this.loading = false;
        this.$refs.submit.removeAttribute('uk-spinner');

        if (response.status === 422 && response.data.errors) {
          this.errors = response.data.errors;
        }
      })
    },
    selectRenter(renter) {
      this.form.renter_id = renter.id;
    },
    selectBook(book) {
      this.selectedBook = book;
      this.form.book_id = book.id;
      this.calculation();
    },
    calculation() {
      if (this.loading) {
        return;
      }

      if (this.isValid()) {
        this.cost.rent = this.selectedBook.cost * this.form.books_count * this.form.period;
        this.cost.minDeposit = this.cost.rent * 0.3;
        this.cost.total = this.cost.rent + this.form.deposit  || this.cost.minDeposit;

        if (this.form.deposit && this.form.deposit < this.cost.minDeposit) {
          this.form.deposit = this.cost.deposit = this.cost.minDeposit;
        }
      } else {
        for (const prop of Object.getOwnPropertyNames(this.cost)) {
          this.cost[prop] = 0;
        }
      }
    },
    isValid(deposit = false) {
      return deposit ? this.form.books_count && this.form.period && this.selectedBook  && this.form.deposit
        : this.form.books_count && this.form.period && this.selectedBook;
    },
    error(input) {
      return toArray(_get(this.errors, input)).pop();
    },
    clearError(input) {
        _set(this.errors, input, null);
    }
  }
}
</script>

<style scoped lang="sass">
    .cost-box
        display: flex
        flex-direction: column
        justify-content: space-between
</style>
