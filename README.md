# ACF Helpers

Few utility classes that help you better manage your ACF fields.

## Create an ACF group.
```php
ACFGroup::create('test_movie_group')
  ->title('Movie Fields')
  ->fields([
    Text::create('job_title')
    ->label('Job Title')
    ->placeholder('Job title')
    ->save(),
  ])
  ->location([
    [
      [
        'param' => 'post_type',
				'operator' => '==',
				'value' => 'movie',
      ]
    ]
  ])
  ->save();
```

## Create a `text` field.

```php
Text::create('first_name')
  ->label('First Name')
  ->ariaLabel('Enter your first name')
  ->instructions('Please enter your first name, maximum length of 50 characters')
  ->required(1)
  ->conditionalLogic(0)
  ->wrapperWidth(50)
  ->wrapperClass('first-name')
  ->wrapperID('first-name')
  ->maxlength(50)
  ->placeholder('Your first name')
  ->prepend('Before input')
  ->append('After input')
  ->save()
```
