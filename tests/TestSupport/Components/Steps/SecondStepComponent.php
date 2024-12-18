<?php

namespace Spatie\LivewireWizard\Tests\TestSupport\Components\Steps;

use Spatie\LivewireWizard\Components\StepComponent;

class SecondStepComponent extends StepComponent
{
    public $counter = 0;

    public function increment()
    {
        $this->counter = $this->counter + 1;
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Second step',
        ];
    }

    public function render()
    {
        return view('test::second-step', [
            'allStepState' => $this->state()->all(),
            'firstStepState' => $this->state()->forStep('second-step'),
            'currentStepState' => $this->state()->currentStep(),
            'orderValueFromPreviousStep' => $this->state()->forStepClass(FirstStepComponent::class)['order'] ?? 'none',
        ]);
    }
}
