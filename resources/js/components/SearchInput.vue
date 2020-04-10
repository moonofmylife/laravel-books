<template>
    <div  class="uk-form-control uk-position-relative" v-focus-outside="focusout" v-click-outside="focusout">
        <input v-if="name" type="hidden" :name="name" :value="selected && selected[valueAttribute] || ''" :required="required">
        <input type="text" class="uk-input" :class="classes" v-model.trim="query" @keydown.esc="focusout" :placeholder="placeholder" required="required">

        <div v-if="results.length" class="results-box uk-box-shadow-medium">
            <ul class="uk-nav purple-list">
                <li v-for="resource in results" :key="resource.id">
                    <a @click.prevent="select(resource)" class="action-link" v-text="resource[showAttribute]"></a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
  import { get as _get } from 'lodash';
  export default {
    props: {
      /**
       * Url for searching resource
       */
      url: {
        type: String,
        required: true
      },
      /**
       * Parameter that contains resources in the response from the server
       */
      param: {
        type: String
      },
      /**
       * Attribute that is displayed for selecting the result
       */
      showAttribute: {
        type: String,
        required: true
      },
      /**
       * Attribute to assign a value to the hidden field
       * Required for the server to understand which resource was selected
       */
      valueAttribute: {
        type: String,
        default: 'id'
      },
      /**
       * The selected default resource (object)
       */
      value: {
        type: Object
      },
      /**
       * Input name
       */
      name: {
        type: String
      },
      /**
       * Input required or optional
       */
      required: {
        type: [Boolean, String],
        default: false
      },
      /**
       * Input placeholder
       */
      placeholder: {
        type: String
      },
      /**
       * Classes for input
       */
      classes: {
        type: [String, Object]
      }
    },
    data: () => ({
      query: '',
      results: [],
      selected: null
    }),
    watch: {
      async query(value) {
        if (!value.length) {
          this.results = [];
          this.selected = null;
          return;
        }

        if (this.value && this.value[this.showAttribute] === value
          || this.selected && this.selected[this.showAttribute] === value
        ) {
          return;
        }

        this.selected = null;

        const { data } = await axios.get(`${this.url}/${this.query}`);
        this.results = this.param ? _get(data, this.param) : data;
      },
      selected(resource) {
        this.$emit('select', resource);
      }
    },
    created() {
      if (this.value) {
        this.query = this.value[this.showAttribute];
        this.selected = this.value;
      }
    },
    methods: {
      select(resource) {
        this.selected = resource;
        this.query = resource[this.showAttribute];
        this.results = '';
      },
      focusout() {
        if (!this.selected || (this.selected && this.selected[this.showAttribute] !== this.query)) {
          this.query = '';
          this.results = '';

          return;
        }

        this.results = '';
        this.query = this.selected[this.showAttribute] || '';
      },
    }
  }
</script>

<style lang="sass">
    .results-box
        position: absolute
        width: 100%
        background: white
        border: 1px solid #e8e8e8
        z-index: 99
        top: 35px
        border-right: 2px
        max-height: 190px
        overflow: auto
</style>
