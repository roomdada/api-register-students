<script>
import useStudent from '@/composables/student.js';
import { onMounted, toRef, reactive } from 'vue';

export default {
  setup() {
    const levels = reactive({});
    const { student, save, getLevels, success } = useStudent();

    onMounted(() => {
       levels.value = getLevels();
    });
    return { student, save, getLevels, success, ...toRef(levels)};
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
        <form class="space-y-6" action="#" method="POST">
          <div>
            <div>
              <input placeholder="Nom" id="first_name" v-model='student.first_name' name="first_name" type="text" required=""
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            </div>
          </div>
          <div>
            <div>
              <input placeholder="Prénoms" v-model='student.last_name' id="last_name" name="last_name" type="text" required=""
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            </div>
          </div>
          <div>
            <div>
              <input placeholder="Votre age" id="age" name="age" v-model='student.age' type="number" required=""
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            </div>
          </div>
          <div>
            {{ levels }}
            <div>
              <select id="level_id" name="level_id" v-model='student.level_id' required=""
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" selected>Votre niveau en laravel</option>
                <option v-for="level in levels" :value="level.id" v-bind:key="level.id">{{ level.name }}</option>
              </select>
            </div>
          </div>
          <div>
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700"> Votre motivation </label>
              <textarea placeholder="Prénoms" id="motivation" v-model='student.motivation' name="motivation" type="text" required=""
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

              </textarea>
            </div>
          </div>
          <div>
            <button type="submit"
              class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-400 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Je m'inscris
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
