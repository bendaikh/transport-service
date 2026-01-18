<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const props = defineProps({
    vehicle: Object
});

const form = useForm({
    registration: props.vehicle.registration,
    brand: props.vehicle.brand,
    model: props.vehicle.model,
    capacity: props.vehicle.capacity,
    service_date: props.vehicle.service_date ? props.vehicle.service_date.split('T')[0] : '',
    status: props.vehicle.status,
    type: props.vehicle.type,
    description: props.vehicle.description || '',
});

const submit = () => {
    form.put(route('vehicles.update', props.vehicle.id));
};

const vehicleTypes = ['Bus', 'Van', 'Camion', 'Minibus', 'Voiture', 'Autre'];
</script>

<template>
    <Head :title="`Modifier ${vehicle.registration}`" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center gap-4">
                <Link :href="route('vehicles.index')" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition">
                    <svg class="w-5 h-5 text-slate-500 dark:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </Link>
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 dark:text-white">
                        Modifier: {{ vehicle.registration }}
                    </h2>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                        {{ vehicle.brand }} {{ vehicle.model }}
                    </p>
                </div>
            </div>
        </template>

        <div class="max-w-3xl">
            <form @submit.prevent="submit" class="space-y-6">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white">Informations de Base</h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Modifiez les informations du véhicule.</p>
                    </div>
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Immatriculation *</label>
                                <input 
                                    v-model="form.registration" 
                                    type="text" 
                                    placeholder="ex: 12345-A-67"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                    required 
                                />
                                <p v-if="form.errors.registration" class="text-red-500 text-sm mt-1">{{ form.errors.registration }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Type de véhicule *</label>
                                <select 
                                    v-model="form.type" 
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                    required
                                >
                                    <option value="">Sélectionner un type</option>
                                    <option v-for="type in vehicleTypes" :key="type" :value="type">{{ type }}</option>
                                </select>
                                <p v-if="form.errors.type" class="text-red-500 text-sm mt-1">{{ form.errors.type }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Marque *</label>
                                <input 
                                    v-model="form.brand" 
                                    type="text" 
                                    placeholder="ex: Mercedes, Toyota..."
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                    required 
                                />
                                <p v-if="form.errors.brand" class="text-red-500 text-sm mt-1">{{ form.errors.brand }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Modèle *</label>
                                <input 
                                    v-model="form.model" 
                                    type="text" 
                                    placeholder="ex: Sprinter, Hiace..."
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                    required 
                                />
                                <p v-if="form.errors.model" class="text-red-500 text-sm mt-1">{{ form.errors.model }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Capacité (places) *</label>
                                <input 
                                    v-model="form.capacity" 
                                    type="number" 
                                    min="1"
                                    placeholder="ex: 50"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                    required 
                                />
                                <p v-if="form.errors.capacity" class="text-red-500 text-sm mt-1">{{ form.errors.capacity }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Date mise en service *</label>
                                <input 
                                    v-model="form.service_date" 
                                    type="date" 
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                                    required 
                                />
                                <p v-if="form.errors.service_date" class="text-red-500 text-sm mt-1">{{ form.errors.service_date }}</p>
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">État</label>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                    <label 
                                        v-for="status in [
                                            { value: 'active', label: 'Actif', color: 'border-green-500 bg-green-50 dark:bg-green-900/20' },
                                            { value: 'inactive', label: 'Inactif', color: 'border-slate-500 bg-slate-50 dark:bg-slate-700' },
                                            { value: 'maintenance', label: 'Maintenance', color: 'border-amber-500 bg-amber-50 dark:bg-amber-900/20' },
                                            { value: 'rented', label: 'Loué', color: 'border-blue-500 bg-blue-50 dark:bg-blue-900/20' }
                                        ]"
                                        :key="status.value"
                                        :class="[
                                            'flex items-center justify-center px-4 py-3 rounded-xl border-2 cursor-pointer transition',
                                            form.status === status.value ? status.color : 'border-slate-200 dark:border-slate-600 hover:border-slate-300'
                                        ]"
                                    >
                                        <input type="radio" v-model="form.status" :value="status.value" class="sr-only" />
                                        <span :class="['text-sm font-medium', form.status === status.value ? 'text-slate-800 dark:text-white' : 'text-slate-500 dark:text-slate-400']">
                                            {{ status.label }}
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white">Informations Additionnelles</h3>
                    </div>
                    <div class="p-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Description / Notes</label>
                            <textarea 
                                v-model="form.description" 
                                rows="4" 
                                placeholder="Ajoutez des notes ou une description pour ce véhicule..."
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
                            ></textarea>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4">
                    <Link :href="route('vehicles.index')" class="px-6 py-2.5 text-slate-600 dark:text-slate-400 hover:text-slate-800 dark:hover:text-white font-medium transition">
                        Annuler
                    </Link>
                    <button 
                        type="submit" 
                        :disabled="form.processing" 
                        class="px-8 py-2.5 bg-amber-500 hover:bg-amber-600 disabled:opacity-50 disabled:cursor-not-allowed text-white rounded-xl font-semibold shadow-lg shadow-amber-500/30 transition flex items-center gap-2"
                    >
                        <svg v-if="form.processing" class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
