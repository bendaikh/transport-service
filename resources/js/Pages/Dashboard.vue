<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

// Mock data for the dashboard
const stats = ref([
    { 
        title: 'VÉHICULES TOTAUX', 
        value: '452', 
        change: '+2.4%', 
        changeType: 'positive',
        icon: 'M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0',
        color: 'from-teal-500 to-teal-600',
        iconBg: 'bg-teal-400'
    },
    { 
        title: 'CHAUFFEURS ACTIFS', 
        value: '389', 
        change: '+1.2%', 
        changeType: 'positive',
        icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
        color: 'from-blue-500 to-blue-600',
        iconBg: 'bg-blue-400'
    },
    { 
        title: 'CONSOMMATION CARBURANT', 
        value: '12,450L', 
        change: '-3.5%', 
        changeType: 'negative',
        icon: 'M13 10V3L4 14h7v7l9-11h-7z',
        color: 'from-amber-400 to-amber-500',
        iconBg: 'bg-amber-300'
    },
    { 
        title: 'REVENU MENSUEL', 
        value: '142,500', 
        suffix: 'DHS',
        change: '+8.1%', 
        changeType: 'positive',
        icon: 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        color: 'from-slate-700 to-slate-800',
        iconBg: 'bg-slate-600'
    },
]);

const alerts = ref([
    { 
        id: 1, 
        title: 'Maintenance Bus #42', 
        description: 'Inspection des freins requise (Retard de 2 jours)', 
        type: 'warning',
        action: 'PROGRAMMER →',
        icon: 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'
    },
    { 
        id: 2, 
        title: 'Expiration Permis', 
        description: 'Chauffeur: Johnathan Doe (Expire dans 5 jours)', 
        type: 'danger',
        action: 'VOIR →',
        icon: 'M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2'
    },
    { 
        id: 3, 
        title: "Déviation d'Itinéraire", 
        description: 'Le Van #112 a quitté la zone de geofencing assignée', 
        type: 'info',
        action: 'LOCALISER →',
        icon: 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7'
    },
]);

const fleetData = ref([
    { id: 'SCH-204', driver: 'Robert Fox', status: 'EN ROUTE', statusColor: 'bg-green-500', fuel: 65, location: 'Centre-Ville' },
    { id: 'FRT-982', driver: 'Jane Cooper', status: 'CHARGEMENT', statusColor: 'bg-amber-500', fuel: 32, location: 'Entrepôt B' },
    { id: 'VAN-115', driver: 'Cody Fisher', status: 'INACTIF', statusColor: 'bg-slate-400', fuel: 88, location: 'Centre de Service' },
]);

const chartData = [
    { month: 'JAN', revenue: 45, expense: 30 },
    { month: 'FÉV', revenue: 52, expense: 35 },
    { month: 'MAR', revenue: 48, expense: 40 },
    { month: 'AVR', revenue: 70, expense: 45 },
    { month: 'MAI', revenue: 65, expense: 50 },
    { month: 'JUIN', revenue: 80, expense: 55 },
];
</script>

<template>
    <Head title="Tableau de bord" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 dark:text-white">
                        Tableau de Bord
                    </h2>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                        Vue d'ensemble de vos opérations de transport.
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <div class="flex rounded-lg overflow-hidden border border-slate-200 dark:border-slate-700 text-sm">
                        <button class="px-3 py-1.5 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-50">Journalier</button>
                        <button class="px-3 py-1.5 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-50">Hebdomadaire</button>
                        <button class="px-3 py-1.5 bg-slate-800 dark:bg-blue-600 text-white font-medium">Mensuel</button>
                    </div>
                </div>
            </div>
        </template>

        <div class="space-y-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                <div 
                    v-for="stat in stats" 
                    :key="stat.title"
                    :class="['rounded-2xl p-5 text-white bg-gradient-to-br shadow-lg', stat.color]"
                >
                    <div class="flex items-start justify-between">
                        <div :class="['w-12 h-12 rounded-xl flex items-center justify-center', stat.iconBg]">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="stat.icon" />
                            </svg>
                        </div>
                        <span :class="[
                            'text-xs font-bold px-2 py-1 rounded-full',
                            stat.changeType === 'positive' ? 'bg-green-400/30 text-green-100' : 'bg-red-400/30 text-red-100'
                        ]">
                            {{ stat.change }}
                        </span>
                    </div>
                    <div class="mt-4">
                        <p class="text-xs font-semibold uppercase tracking-wider opacity-80">{{ stat.title }}</p>
                        <p class="text-2xl sm:text-3xl font-bold mt-1">
                            {{ stat.value }}
                            <span v-if="stat.suffix" class="text-lg font-medium opacity-80">{{ stat.suffix }}</span>
                        </p>
                    </div>
                    <div class="mt-3 h-1.5 bg-white/20 rounded-full overflow-hidden">
                        <div class="h-full bg-white/60 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Performance Chart -->
                <div class="lg:col-span-2 bg-white dark:bg-slate-800 rounded-2xl shadow-sm p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-slate-800 dark:text-white">Performance Financière</h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm">Revenus vs. Dépenses Opérationnelles</p>
                        </div>
                        <div class="flex items-center gap-4 text-sm">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                                <span class="text-slate-600 dark:text-slate-300">Revenus</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-red-400"></span>
                                <span class="text-slate-600 dark:text-slate-300">Dépenses</span>
                            </div>
                        </div>
                    </div>
                    <!-- Chart Visualization -->
                    <div class="h-64 flex items-end justify-between gap-2 sm:gap-4 px-2">
                        <div v-for="data in chartData" :key="data.month" class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full flex gap-1 items-end justify-center h-48">
                                <div 
                                    class="w-5 sm:w-8 bg-gradient-to-t from-red-400 to-red-300 rounded-t-lg transition-all duration-500"
                                    :style="{ height: data.expense + '%' }"
                                ></div>
                                <div 
                                    class="w-5 sm:w-8 bg-gradient-to-t from-blue-600 to-blue-400 rounded-t-lg transition-all duration-500"
                                    :style="{ height: data.revenue + '%' }"
                                ></div>
                            </div>
                            <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">{{ data.month }}</span>
                        </div>
                    </div>
                </div>

                <!-- Alerts Panel -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white">Alertes Opérationnelles</h3>
                        <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">3 URGENTES</span>
                    </div>
                    <div class="space-y-4">
                        <div 
                            v-for="alert in alerts" 
                            :key="alert.id"
                            :class="[
                                'p-4 rounded-xl border-l-4 transition-all hover:shadow-md cursor-pointer',
                                alert.type === 'warning' ? 'bg-amber-50 dark:bg-amber-900/20 border-amber-500' : '',
                                alert.type === 'danger' ? 'bg-red-50 dark:bg-red-900/20 border-red-500' : '',
                                alert.type === 'info' ? 'bg-blue-50 dark:bg-blue-900/20 border-blue-500' : ''
                            ]"
                        >
                            <div class="flex items-start gap-3">
                                <div :class="[
                                    'w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0',
                                    alert.type === 'warning' ? 'bg-amber-100 dark:bg-amber-800' : '',
                                    alert.type === 'danger' ? 'bg-red-100 dark:bg-red-800' : '',
                                    alert.type === 'info' ? 'bg-blue-100 dark:bg-blue-800' : ''
                                ]">
                                    <svg :class="[
                                        'w-5 h-5',
                                        alert.type === 'warning' ? 'text-amber-600 dark:text-amber-300' : '',
                                        alert.type === 'danger' ? 'text-red-600 dark:text-red-300' : '',
                                        alert.type === 'info' ? 'text-blue-600 dark:text-blue-300' : ''
                                    ]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="alert.icon" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-slate-800 dark:text-white text-sm">{{ alert.title }}</h4>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs mt-0.5">{{ alert.description }}</p>
                                    <button :class="[
                                        'text-xs font-bold mt-2 hover:underline',
                                        alert.type === 'warning' ? 'text-amber-600 dark:text-amber-400' : '',
                                        alert.type === 'danger' ? 'text-red-600 dark:text-red-400' : '',
                                        alert.type === 'info' ? 'text-blue-600 dark:text-blue-400' : ''
                                    ]">{{ alert.action }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="w-full mt-4 text-center text-sm text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 font-medium py-2 border border-slate-200 dark:border-slate-700 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        VOIR TOUTES LES NOTIFICATIONS
                    </button>
                </div>
            </div>

            <!-- Fleet Status Table -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden">
                <div class="p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white">Statut de la Flotte en Temps Réel</h3>
                    <button class="px-4 py-2 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-600 transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                        Voir sur la Carte
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[600px]">
                        <thead class="bg-slate-50 dark:bg-slate-900/50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">ID Véhicule</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Chauffeur</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Niveau Carburant</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Localisation</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                            <tr v-for="vehicle in fleetData" :key="vehicle.id" class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 bg-slate-200 dark:bg-slate-600 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-slate-500 dark:text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                            </svg>
                                        </div>
                                        <span class="font-bold text-slate-800 dark:text-white">{{ vehicle.id }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-slate-600 dark:text-slate-300">{{ vehicle.driver }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span :class="['px-2.5 py-1 rounded-full text-xs font-bold text-white', vehicle.statusColor]">
                                        {{ vehicle.status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-24 h-2 bg-slate-200 dark:bg-slate-600 rounded-full overflow-hidden">
                                            <div 
                                                :class="[
                                                    'h-full rounded-full transition-all',
                                                    vehicle.fuel > 60 ? 'bg-green-500' : vehicle.fuel > 30 ? 'bg-amber-500' : 'bg-red-500'
                                                ]"
                                                :style="{ width: vehicle.fuel + '%' }"
                                            ></div>
                                        </div>
                                        <span class="text-sm text-slate-600 dark:text-slate-300 font-medium">{{ vehicle.fuel }}%</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-slate-600 dark:text-slate-300">{{ vehicle.location }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
