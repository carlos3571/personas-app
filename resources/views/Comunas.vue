<template>
  <div class="container">
    <h1 class="text-start">Listado Comunas |
      <button @click="newComuna()"
              class="btn btn-success mx-2">
        <font-awesome-icon icon="plus" />
      </button>
    </h1>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Code</th>
          <th scope="col">Name</th>
          <th scope="col">Municipality</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(comuna, index) in comunas" :key="index">
          <th scope="row">{{ index + 1 }}</th>
          <td>{{ comuna.comu_codi }}</td>
          <td>{{ comuna.comu_nomb }}</td>
          <td>{{ comuna.muni_nomb }}</td>
          <td>
            <button @click="deleteComuna(comuna.comu_codi)"
                    class="btn btn-danger mx-2">
              <font-awesome-icon icon="trash" />
            </button>
            <button @click="editComuna(comuna.comu_codi)"
                    class="btn btn-warning mx-2">
              <font-awesome-icon icon="pencil" />
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import axios from 'axios'
import Swal from 'sweetalert2'

export default {
  name: 'Comuna',
  data() {
    return {
      comunas: []
    }
  },
  methods: {
    deleteComuna(codigo) {
      Swal.fire({
        title: `Do you want to delete the Comuna with id ${codigo}?`,
        showCancelButton: true,
        confirmButtonText: 'Delete',
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete(`http://127.0.0.1:8000/api/comunas/${codigo}`)
            .then(response => {
              if (response.data.success) {
                Swal.fire('Deleted!!', '', 'success')
                this.comunas = response.data.comunas
              }
            })
        }
      })
    }
  }
}
editComuna(id) {
  this.$router.push({ name: 'EditarComuna', params: { id: `${id}` } })
},

newComuna() {
  this.$router.push({ name: 'NewComuna' });
},

mounted() {
  axios
    .get('http://127.0.0.1:8000/api/comunas')
    .then(response => (this.comunas = response.data.comunas.data))
},


