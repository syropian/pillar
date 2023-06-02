import defaultTheme from 'tailwindcss/defaultTheme'
import colors from 'tailwindcss/colors'
import { type Config } from 'tailwindcss'

export default {
  content: ['./resources/**/*.{js,ts,vue,blade.php}'],
  theme: {
    extend: {
      colors: {
        primary: colors.pink,
      },
      fontFamily: {
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [require('@tailwindcss/forms')],
} satisfies Config
