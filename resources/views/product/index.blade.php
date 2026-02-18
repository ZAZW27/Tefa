<x-layouts::app :title="__('Dashboard')">
    <main
    x-data="{
            cartItems: [], 
            helloWorld(produk){
                let found = this.cartItems.find(i=>i.id === produk.id); 
                if(found)
                {
                    found.quantity++; 
                }else{
                    this.cartItems.push({ ...produk, quantity: 1}); 
                }
            },

            clearItems(){
                this.cartItems = []; 
            },

            checkout() {
                if (this.cartItems.length === 0) return alert('cart is empty!');
    
                fetch('/checkout', {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ items: this.cartItems })
                })
                .then(async response => {
                    const data = await response.json();
                    if (!response.ok) {
                        throw new Error(data.message || 'Server Error');
                    }
                    return data;
                })
                .then(data => {
                    alert(data.message);
                    this.clearItems(); 
                    {{-- this.cartOpen = false; --}}
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Checkout Failed: ' + error.message);
                });
            }
        }
    "
    class="flex">
        <section class="flex flex-wrap gap-2">
            @foreach ($products as $item )
                <section class="bg-stone-700 p-2 rounded-lg">
                    <img class="w-62 h-62" src="{{ $item->gambar }}" alt="{{ $item->nama }}">
                    <div class="flex gap-4 flex-col mt-4">
                        <p class="text-slate-200 font-bold">
                            {{ $item->nama }}                    
                        </p>
                        <button 
                        class="bg-emerald-600 px-4 py-2 rounded-md shadow-md"
                        @click="helloWorld({
                            id: {{ $item->id }}, 
                            nama: '{{ $item->nama }}', 
                            harga: {{ $item->harga }} 
                        })">
                            Tambah keranjang
                        </button>
                    </div>
                </section>
            @endforeach
        </section>
        <section 
            class="min-w-[20svw] rounded-lg bg-stone-700 flex flex-col h-[90svh] 
            sticky top-4">
            <button @click="checkout()" class="bg-emerald-600 py-2 px-4">Buat Transaksi</button>
            <span x-text="'Rp ' + cartItems.reduce((acc, i) => acc + (i.harga * i.quantity), 0).toLocaleString('id-ID')"></span>
            <section class="text-slate-200">   
                <template x-for="(item, index) in cartItems" :key="item.id">
                    <div class="flex justify-between items-center bg-stone-600 p-3 rounded-xl border border-stone-700">
                        <div>
                            <p class="text-slate-200 font-medium" x-text="item.nama"></p>
                            <p class="text-emerald-500 text-sm font-mono" x-text="'Rp ' + (item.harga * item.quantity).toLocaleString('id-ID')"></p>
                        </div>
                        
                        <div class="flex items-center gap-3 bg-stone-900 px-3 py-1 rounded-lg border border-stone-700">
                            <button 
                                @click="item.quantity > 1 ? item.quantity-- : cartItems.splice(index, 1)" 
                                class="text-stone-400 hover:text-white font-bold">-</button>
                            
                            <span class="text-white text-sm font-mono" x-text="item.quantity"></span>
                            
                            <button 
                                @click="item.quantity++" 
                                class="text-stone-400 hover:text-white font-bold">+</button>
                        </div>
                    </div>
                </template>
            </section>
        </section>
    </main>
</x-layouts::app>
