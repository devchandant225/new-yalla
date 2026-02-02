<section class="py-24 bg-gray-900 text-white relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 w-1/2 h-full bg-white/5 -skew-x-12 transform translate-x-32"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-white font-bold tracking-widest uppercase text-xs mb-4 block">Financial Planning</span>
                <h2 class="text-4xl md:text-5xl font-serif font-bold mb-8">Mortgage <span class="text-white italic underline decoration-1 decoration-white/30 underline-offset-4">Calculator</span></h2>
                <p class="text-gray-400 text-lg mb-10 leading-relaxed">
                    Planning your investment in Dubai? Use our advanced mortgage calculator to estimate your monthly payments and see how much you can afford.
                </p>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white mt-1">
                            <i class="fas fa-percent"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white uppercase tracking-wider text-sm">Competitive Rates</h4>
                            <p class="text-gray-500 text-sm">We partner with leading UAE banks to offer you the best interest rates.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white mt-1">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white uppercase tracking-wider text-sm">Flexible Terms</h4>
                            <p class="text-gray-500 text-sm">Choose from 5 to 25 years mortgage plans tailored to your needs.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 md:p-12 shadow-2xl" x-data="{ 
                price: 2000000, 
                downPayment: 20, 
                interest: 4.5, 
                years: 25,
                monthlyPayment: 0,
                calculate() {
                    const principal = this.price * (1 - (this.downPayment / 100));
                    const monthlyInterest = (this.interest / 100) / 12;
                    const numberOfPayments = this.years * 12;
                    this.monthlyPayment = (principal * (monthlyInterest * Math.pow(1 + monthlyInterest, numberOfPayments))) / (Math.pow(1 + monthlyInterest, numberOfPayments) - 1);
                }
            }" x-init="calculate()">
                <div class="space-y-8">
                    <div>
                        <div class="flex justify-between mb-2">
                            <label class="text-xs font-bold text-gray-900 uppercase tracking-widest">Property Price (AED)</label>
                            <span class="text-gray-900 font-bold" x-text="new Intl.NumberFormat().format(price)"></span>
                        </div>
                        <input type="range" x-model="price" @input="calculate()" min="500000" max="20000000" step="100000" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-black">
                    </div>

                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <div class="flex justify-between mb-2">
                                <label class="text-xs font-bold text-gray-900 uppercase tracking-widest">Down Payment</label>
                                <span class="text-gray-900 font-bold" x-text="downPayment + '%'"></span>
                            </div>
                            <input type="number" x-model="downPayment" @input="calculate()" class="w-full bg-gray-50 border border-gray-100 p-3 text-gray-900 focus:outline-none focus:border-black transition">
                        </div>
                        <div>
                            <div class="flex justify-between mb-2">
                                <label class="text-xs font-bold text-gray-900 uppercase tracking-widest">Interest Rate</label>
                                <span class="text-gray-900 font-bold" x-text="interest + '%'"></span>
                            </div>
                            <input type="number" x-model="interest" @input="calculate()" step="0.1" class="w-full bg-gray-50 border border-gray-100 p-3 text-gray-900 focus:outline-none focus:border-black transition">
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2">
                            <label class="text-xs font-bold text-gray-900 uppercase tracking-widest">Loan Period (Years)</label>
                            <span class="text-gray-900 font-bold" x-text="years"></span>
                        </div>
                        <select x-model="years" @change="calculate()" class="w-full bg-gray-50 border border-gray-100 p-4 text-gray-900 focus:outline-none focus:border-black appearance-none transition">
                            <option value="5">5 Years</option>
                            <option value="10">10 Years</option>
                            <option value="15">15 Years</option>
                            <option value="20">20 Years</option>
                            <option value="25">25 Years</option>
                        </select>
                    </div>

                    <div class="pt-8 border-t border-gray-100 text-center">
                        <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-2">Estimated Monthly Payment</p>
                        <h3 class="text-4xl font-serif font-bold text-gray-900">AED <span x-text="new Intl.NumberFormat().format(Math.round(monthlyPayment))"></span></h3>
                        <a href="{{ route('contact') }}" class="mt-8 inline-block bg-black text-white px-10 py-4 font-bold uppercase tracking-widest text-xs hover:bg-white hover:text-black border border-black transition duration-300">Get Pre-Approved</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>