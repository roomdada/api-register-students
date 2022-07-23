import { ref, reactive } from 'vue';
import axios from 'axios';

export default function useStudent() {
  const student = reactive({
    first_name: '',
    last_name: '',
    motivtion: '',
    age: '',
    level_id: '',
  });


  const success = ref('');

  const save = async () => {
    await axios.post("https://api-regs.herokuapp.com/api/students", student).then((res) => {
      success.value = 'Votre inscription a été prise en compte';
      console.log(res);
    }).catch((err) => {
      console.log(err);
    })
  }

  const getLevels = async () => {
    await axios.get("https://api-regs.herokuapp.com/api/v1/levels").then((res) => {
      return res.data.data;
    }).catch((err) => {
      console.log(err);
    })
  }

  return { student, save, getLevels, success};
}
