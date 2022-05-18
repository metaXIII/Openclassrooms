import { MemoryRouter } from 'react-router-dom'
import { SurveyProvider, ThemeProvider } from '../context'
import { render } from '@testing-library/react'

const Wrapper = ({ children }) => {
  return (
    <MemoryRouter>
      <ThemeProvider>
        <SurveyProvider>{children}</SurveyProvider>
      </ThemeProvider>
    </MemoryRouter>
  )
}

export default function test_render(child) {
  render(child, { wrapper: Wrapper })
}
