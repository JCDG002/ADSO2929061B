// Interfaces para tipado fuerte
interface CounterConfig {
    initialValue: number;
    minValue: number;
    maxValue: number;
    step: number;
}

interface CounterState {
    value: number;
    history: number[];
}

// Enum para las acciones del contador
enum CounterAction {
    INCREMENT = 'increment',
    DECREMENT = 'decrement',
    RESET = 'reset',
    SET_VALUE = 'set_value'
}

// Clase Counter bien estructurada
class Counter {
    private state: CounterState;
    private config: CounterConfig;
    private displayElement: HTMLElement | null;
    private historyElement: HTMLElement | null;
    private isAnimating: boolean = false;
    private animationInterval: number | null = null;

    constructor(config: CounterConfig) {
        this.config = config;
        this.state = {
            value: config.initialValue,
            history: [config.initialValue]
        };
        this.displayElement = document.getElementById('counter-display');
        this.historyElement = document.getElementById('counter-history');
        this.initializeUI();
    }

    // Método privado para inicializar la UI
    private initializeUI(): void {
        this.updateDisplay();
        this.setupEventListeners();
    }

    // Configurar event listeners
    private setupEventListeners(): void {
        const incrementBtn = document.getElementById('btn-increment');
        const decrementBtn = document.getElementById('btn-decrement');
        const resetBtn = document.getElementById('btn-reset');
        const setValueBtn = document.getElementById('btn-set-value');
        const inputValue = document.getElementById('input-value') as HTMLInputElement;

        incrementBtn?.addEventListener('click', () => this.handleAction(CounterAction.INCREMENT));
        decrementBtn?.addEventListener('click', () => this.handleAction(CounterAction.DECREMENT));
        resetBtn?.addEventListener('click', () => this.handleAction(CounterAction.RESET));
        
        setValueBtn?.addEventListener('click', () => {
            const value = parseInt(inputValue?.value || '0', 10);
            if (!isNaN(value)) {
                this.handleAction(CounterAction.SET_VALUE, value);
            }
        });
    }

    // Manejar acciones del contador
    private handleAction(action: CounterAction, value?: number): void {
        switch (action) {
            case CounterAction.INCREMENT:
                this.increment();
                break;
            case CounterAction.DECREMENT:
                this.decrement();
                break;
            case CounterAction.RESET:
                this.reset();
                break;
            case CounterAction.SET_VALUE:
                if (value !== undefined) {
                    this.setValue(value);
                }
                break;
        }
        this.updateDisplay();
        this.updateHistory();
    }

    // Incrementar contador
    public increment(): void {
        const newValue = this.state.value + this.config.step;
        if (newValue <= this.config.maxValue) {
            this.state.value = newValue;
            this.addToHistory(newValue);
        }
    }

    // Decrementar contador
    public decrement(): void {
        const newValue = this.state.value - this.config.step;
        if (newValue >= this.config.minValue) {
            this.state.value = newValue;
            this.addToHistory(newValue);
        }
    }

    // Resetear contador con animación
    public reset(): void {
        // Si ya hay una animación en curso, no hacer nada
        if (this.isAnimating) {
            return;
        }

        const currentValue = this.state.value;
        const targetValue = this.config.initialValue;

        // Si ya está en el valor inicial, no hacer nada
        if (currentValue === targetValue) {
            return;
        }

        this.isAnimating = true;
        
        // Determinar dirección de la animación
        const step = currentValue > targetValue ? -1 : 1;
        let current = currentValue;

        // Función para animar
        const animate = (): void => {
            current += step;
            this.state.value = current;
            this.updateDisplay();

            // Si llegamos al valor objetivo, detener la animación
            if (current === targetValue) {
                this.isAnimating = false;
                if (this.animationInterval !== null) {
                    clearInterval(this.animationInterval);
                    this.animationInterval = null;
                }
                this.addToHistory(targetValue);
                this.updateHistory();
            }
        };

        // Iniciar animación con intervalo
        this.animationInterval = window.setInterval(animate, 50); // 50ms entre cada paso
    }

    // Establecer valor específico
    public setValue(value: number): void {
        if (value >= this.config.minValue && value <= this.config.maxValue) {
            this.state.value = value;
            this.addToHistory(value);
        }
    }

    // Obtener valor actual
    public getValue(): number {
        return this.state.value;
    }

    // Agregar a historial
    private addToHistory(value: number): void {
        this.state.history.push(value);
        // Mantener solo los últimos 10 valores
        if (this.state.history.length > 10) {
            this.state.history.shift();
        }
    }

    // Actualizar display
    private updateDisplay(): void {
        if (this.displayElement) {
            this.displayElement.textContent = this.state.value.toString();
            
            // Cambiar color según el valor
            this.displayElement.className = 'text-6xl font-bold transition-colors duration-300';
            if (this.state.value > 0) {
                this.displayElement.classList.add('text-green-600');
            } else if (this.state.value < 0) {
                this.displayElement.classList.add('text-red-600');
            } else {
                this.displayElement.classList.add('text-gray-600');
            }
        }
    }

    // Actualizar historial
    private updateHistory(): void {
        if (this.historyElement) {
            const recentHistory = this.state.history.slice(-5).reverse();
            this.historyElement.innerHTML = recentHistory
                .map((value, index) => {
                    const badgeClass = value > 0 ? 'badge-success' : value < 0 ? 'badge-error' : 'badge-neutral';
                    return `<span class="badge ${badgeClass} mx-1">${value}</span>`;
                })
                .join('');
        }
    }

    // Obtener estadísticas
    public getStats(): { current: number; max: number; min: number; average: number } {
        const values = this.state.history;
        return {
            current: this.state.value,
            max: Math.max(...values),
            min: Math.min(...values),
            average: Math.round(values.reduce((a, b) => a + b, 0) / values.length)
        };
    }
}

// Inicializar la aplicación cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    const config: CounterConfig = {
        initialValue: 0,
        minValue: -100,
        maxValue: 100,
        step: 1
    };

    const counter = new Counter(config);

    // Mostrar estadísticas
    const statsBtn = document.getElementById('btn-stats');
    const statsElement = document.getElementById('counter-stats');

    statsBtn?.addEventListener('click', () => {
        if (statsElement) {
            const stats = counter.getStats();
            statsElement.innerHTML = `
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-title">Current</div>
                        <div class="stat-value text-primary">${stats.current}</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title">Max</div>
                        <div class="stat-value text-success">${stats.max}</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title">Min</div>
                        <div class="stat-value text-error">${stats.min}</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title">Average</div>
                        <div class="stat-value text-info">${stats.average}</div>
                    </div>
                </div>
            `;
        }
    });
});

