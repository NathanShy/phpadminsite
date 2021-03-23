<template>
  <div>
    <h1>ITEMS</h1>
    <div>
      <!-- This example requires Tailwind CSS v2.0+ -->
      <div
        class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6"
      >
        <div
          class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"
        >
          <div>
            <p class="text-sm text-gray-700">
              Page
              <span class="font-medium">{{ pagination.current_page }}</span>
              of
              <span class="font-medium">{{ pagination.last_page }}</span>
              results
            </p>
          </div>
          <div>
            <nav
              class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
              aria-label="Pagination"
            >
              <a
                href="#"
                @click="fetchProducts(pagination.prev_page_url)"
                v-bind:class="[{ disabled: !pagination.prev_page_url }]"
                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
              >
                <span class="sr-only">Previous</span>
                <!-- Heroicon name: solid/chevron-left -->
                <svg
                  class="h-5 w-5"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  <path
                    fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
              <a
                href="#"
                @click="fetchProducts(pagination.next_page_url)"
                v-bind:class="[{ disabled: !pagination.next_page_url }]"
                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
              >
                <span class="sr-only">Next</span>
                <!-- Heroicon name: solid/chevron-right -->
                <svg
                  class="h-5 w-5"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  <path
                    fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div>
      <form @submit.prevent="saveProduct">
        <div class="mb-4">
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

    <div v-if="0 < products.length">
      <a class="mb-2" v-for="product in products" :key="product.id">
        <div class="mb-4">
          <h2>
            <strong>{{ product.name }}</strong>
          </h2>
          <h3>Product Image</h3>
          <p>
            <strong> {{ product.category }}</strong>
          </p>
          <p>{{ product.description }}</p>
          <p>
            <small>{{ product.date }}</small>
          </p>
          <button
            @click="editProduct(product)"
            class="bg-blue-600 text-white p-2 rounded"
          >
            Edit
          </button>
          <button
            @click="deleteProduct(product.id)"
            class="bg-red-600 text-white p-2 rounded"
          >
            Delete
          </button>
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
      product: {
        user_id: this.$userId,
        name: "",
        category: "",
        date: "",
        description: "",
      },
      product_id: "",
      pagination: {},
      user_id: this.$userId,
    };
  },

  created() {
    this.fetchProducts();
  },

  methods: {
    fetchProducts(page_url) {
      let vm = this;
      page_url = this.page_url = page_url || `/api/products/${this.$userId}`;
      fetch(page_url)
        .then((res) => res.json())
        .then((res) => {
          this.products = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch((err) => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev,
      };

      this.pagination = pagination;
    },
    deleteProduct(id) {
      if (confirm("are you sure?")) {
        fetch(`/api/products/delete/${id}`, {
          method: "delete",
        })
          .then((res) => res.json())
          .then((data) => {
            alert("product removed");
            this.fetchProducts();
          })
          .catch((err) => console.log(err));
      }
    },
    editProduct(product) {
      this.product.id = product.id;
      this.product.user_id = product.user_id;
      this.product.name = product.name;
      this.product.category = product.category;
      this.product.date = product.date;
      this.product.description = product.description;
    },
    saveProduct() {
      fetch(`/api/products/edit`, {
        method: "put",
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

          alert("Product updated");
          this.fetchProducts();
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>

