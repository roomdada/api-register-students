<script>
import useStudent from '@/composables/student.js';
import { onMounted, reactive, ref } from 'vue';

export default {
  setup() {
    const form = reactive({
      'first_name': '',
      'last_name': '',
      'age': '',
      'level_id': '',
      'motivation': '',
    });

    const loading = ref(false);
    const errors = ref([]);

    const { saveStudent, getLevels, success, levels } = useStudent();

    onMounted(() => {
      levels.value = getLevels();
    });

    const save = async () => {
      loading.value = true;
      await saveStudent({ ...form }).then((res) => {
        console.log(res);
      }).catch((err) => {
        errors.value = err.response.data.errors;
        console.log(errors.value);
      }).finally(() => {
        loading.value = false;
        clear();

      });
      loading.value = false;

    }

    const clear = () => {
      form.first_name = '';
      form.last_name = '';
      form.age = '';
      form.level_id = '';
      form.motivation = '';
    }

    return { success, levels, form, save, loading, errors };
  }

}
</script>
<template>
  <div class="min-h-full flex flex-col justify-center py-12 border-2 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <h2 class="mt-6 text-center text-5xl font-extrabold text-gray-900">Bienvenue sur E-register</h2>
      <p class="text-center">
        Veuillez remplit le formulaire ci-dessous pour la formation en Laravel pro.
      </p>
     
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-12 px-4 shadow sm:rounded-lg sm:px-10">
        <form class="space-y-6" @submit.prevent="save">
          <div>
            <div>
              <input placeholder="Nom" id="form.first_name" v-model='form.first_name' name="first_name" type="text"
                
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                <span v-if="errors.first_name" class="text-red-600"> {{ errors.first_name }}</span>
            </div>
          </div>
          <div>
            <div>
              <input placeholder="Prénoms" v-model='form.last_name' id="form.last_name" name="last_name" type="text"
                
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
              <span v-if="errors.last_name" class="text-red-600"> {{ errors.last_name }}</span>

            </div>
          </div>
          <div>
            <div>
              <input placeholder="Votre age" id="age" name="age" v-model='form.age' type="number" 
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                <span v-if="errors.age" class="text-red-600"> {{ errors.age }}</span>

            </div>
          </div>
          <div>
            <div>
              <select id="level_id" name="level_id" v-model='form.level_id' 
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" selected>Votre niveau en laravel</option>
                <option v-for="level in levels" :value="level.id" v-bind:key="level.id">{{ level.name }}</option>
              </select>
              <span v-if="errors.level_id" class="text-red-600"> {{ errors.level_id }}</span>
            </div>
          </div>
          <div>
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700"> Votre motivation </label>
              <textarea id="motivation" v-model='form.motivation' name="motivation" type="text" 
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

              </textarea>
                <span v-if="errors.motivation" class="text-red-600"> {{ errors.motivation }}</span>
            </div>
          </div>
          <div>
            <button v-if="!loading" type="submit"
              class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-400 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Je m'inscris
            </button>
            <button v-else type="submit"
              class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-400 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Enregistrement en cours...
            </button>

          </div>
        </form>
      </div>
    </div>
  </div>
</template>
