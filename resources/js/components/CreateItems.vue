<template>
  <div>
    <form @submit="checkForm" @submit.prevent="addProduct">
      <div class="mb-4">
        <h1><b>Create Products</b></h1>
        <!-- <p v-if="errors.length">
          <b>Please correct the following error(s):</b>
          <ul>
            <li v-for="error in errors">{{ error }}</li>
          </ul>
        </p> -->

        <label for="name">Name</label>
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Product Name"
          v-model="product.name"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg"
        />

        <label for="category">Category</label>
        <input
          type="text"
          name="category"
          id="category"
          placeholder="Product Category"
          v-model="product.category"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg"
        />

        <label for="date">Date</label>
        <input
          type="date"
          name="date"
          id="date"
          v-model="product.date"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg"
        />

        <label for="description">Description</label>
        <textarea
          name="description"
          id="description"
          cols="30"
          rows="4"
          placeholder="Product Description"
          v-model="product.description"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg"
        ></textarea>
      </div>

      <div>
        <button
          type="submit"
          class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full"
        >
          Save
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      products: [],
      product: {
        user_id: this.$userId,
        name: "",
        category: "",
        date: "",
        description: "",
      },
      errors: [],
      product_id: "",
      pagination: {},
      edit: false,
      user_id: this.$userId,
    };
  },

  methods: {
    addProduct() {
      fetch(`../api/products/new`, {
        method: "post",
        body: JSON.stringify(this.product),
        headers: {
          "content-type": "application/json",
        },
      })
        .then((res) => res.json())
        .then((data) => {
          this.product.name = "";
          this.product.category = "";
          this.product.date = "";
          this.product.description = "";

          alert("Product added");
          window.location.href = "../products";
        })
        .catch((err) => console.log(err));
    },
    checkForm: function (e) {
      if (
        this.product.name &&
        this.product.category &&
        this.products.date &&
        this.product.description
      ) {
        return true;
      }

      if (this.product.name) {
        this.errors.push("Name is Required");
      }

      if (this.product.category) {
        this.errors.push("Category is Required");
      }

      if (this.product.date) {
        this.errors.push("Date is Required");
      }

      if (this.product.description) {
        this.errors.push("Description is Required");
      }
    },
  },
};
</script>