import { ref } from 'vue';
import axios from 'axios';

export default function useStudent() {

  const success = ref('');
  const levels = ref([]);

  const saveStudent = async (data) => {
    await axios.post("https://api-regs.herokuapp.com/api/v1/students", data);
  }


const getLevels = async () => {
  await axios.get("https://api-regs.herokuapp.com/api/v1/levels").then((res) => {
    levels.value = res.data.data;
  }).catch((err) => {
    console.log(err);
  })
}

return { saveStudent, getLevels, success, levels };
}
