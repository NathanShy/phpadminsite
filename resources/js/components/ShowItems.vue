<template>
  <!-- @if ($products->count()) @foreach ($products as $products)
  <div class="mb-4">
    <h3>{{ $products->name }}</h3>
    <p>Image</p>
    <p>
      <strong> {{ $products->category }}</strong>
    </p>
    <p>{{ $products->description }}</p>
    <p>
      <small>{{ $products->date }}</small>
    </p>
  </div>
  @endforeach @else
  <p>There are no products</p>
  @endif -->
  <div>
    <h1>ITEMS</h1>
    <div v-if="0 < products.length">
      <a class="show-item-item" v-for="product in products" :key="product.id">
        <div v-if="user_id == product.user_id">
          <div class="mb-4">
            <h2>
              <strong>{{ product.name }}</strong>
            </h2>
            <h3>Product Image</h3>
            <p>Image</p>
            <p>
              <strong> {{ product.category }}</strong>
            </p>
            <p>{{ product.description }}</p>
            <p>
              <small>{{ product.date }}</small>
            </p>
          </div>
        </div>
      </a>
    </div>

    <div v-else>
      <h2>There are no products</h2>
    </div>
  </div>
</template>

<script>
export default {
  props: ["app"],
  data: function () {
    return {
      products: [],
      user_id: this.$userId,
    };
  },

  mounted() {
    this.loadProducts();
    console.log(this.$userId);
  },

  methods: {
    loadProducts: function () {
      //load api
      axios
        .get("/api/products")
        //assign to variables
        .then((response) => {
          this.products = response.data.data;
        })
        // catch errors
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>

