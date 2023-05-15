<template>
  <div class="home">
    <div>
      <table>
        <td>email</td>
        <td>senha</td>
        <tr v-for="(obj, index) in csv" :key="index">
          <td>
           {{ obj.user.email }}
          </td>
          <td>
            {{ obj.user.name }}
          </td>
        </tr>  
      </table>      
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      csv: {},
    };
  },
  created() {
    this.dataCSV();
  },
  methods: {
    dataCSV() {
      axios
        .get("http://localhost:9090/copiarCSV.php")
        .then((response) => {
          let json = response.data;
          this.csv = json;
          console.log(json);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
